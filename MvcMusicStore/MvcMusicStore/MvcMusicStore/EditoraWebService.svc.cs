using MvcMusicStore.Models;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;

namespace MvcMusicStore
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the class name "EditoraWebService" in code, svc and config file together.
    // NOTE: In order to launch WCF Test Client for testing this service, please select EditoraWebService.svc or EditoraWebService.svc.cs at the Solution Explorer and start debugging.
    public class EditoraWebService : IEditoraWebService
    {
        public void DoWork()
        {
        }


        public string GetCatalogo(string API_key)
        {
            string json;

            MusicStoreEntities db = new MusicStoreEntities();

            if (db.Users.FirstOrDefault(u => u.PasswordSalt == API_key) != null)
            {

                List<Album> alb = db.Albums.ToList();

                json = JsonConvert.SerializeObject(alb);

                return json;
            }

            return "API_key desconhecida";
        }

        public int CreateOrder(string API_key,float total)
        {
            MusicStoreEntities db = new MusicStoreEntities();

            var user = db.Users.FirstOrDefault(u => u.PasswordSalt == API_key);

            if (user != null)
            {
                Order order = new Order
                {
                    TotalPrice = total,
                    UserID = user.UserId,
                    FirstName = "Sem Nome",
                    LastName = "Sem Nome",
                    OrderDate = DateTime.Now,
                    OrderDetails =  new List<OrderDetail>(),
                    
                };

                db.Orders.Add(order);
                db.SaveChanges();

                var mail = new Mail();
                mail.Send(user.Email);

                return order.OrderID;
            }
            return -1;
        }

        public void FinishOrder(int orderID, int qnt, float price, int albumID)
        {
            MusicStoreEntities db = new MusicStoreEntities();

            var order = db.Orders.FirstOrDefault(o => o.OrderID == orderID);

            if(order != null)
            {

                OrderDetail detail = new OrderDetail{
                    Price = price,
                    Quantity = qnt,
                    OrderID = order.OrderID,
                    AlbumID = db.Albums.FirstOrDefault(a => a.AlbumId == albumID).AlbumId
                };

                db.OrdersDetails.Add(detail);

                db.SaveChanges();
            }
        }


        public string GetAPI_Key(string username, string password)
        {
            var crypto = new SimpleCrypto.PBKDF2();
            using (var db = new MusicStoreEntities())
            {
                var user = db.Users.FirstOrDefault(u => u.Email == username);

                if (user != null)
                {
                    if (user.Password == crypto.Compute(password, user.PasswordSalt))
                    {
                        return user.PasswordSalt;
                    }
                }
            }

            return "Utilizador Desconhecido";
        }

    }
}
