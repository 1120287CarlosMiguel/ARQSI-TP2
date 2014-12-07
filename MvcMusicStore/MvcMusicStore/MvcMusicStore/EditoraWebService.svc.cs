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


        public string GetCatalogo()
        {
            string json;

            MusicStoreEntities db = new MusicStoreEntities();

            List<Album> alb = db.Albums.ToList();

            json = JsonConvert.SerializeObject(alb);

            return json;
        }


        public int CreateOrder(string api_key, double total)
        {
            MusicStoreEntities db = new MusicStoreEntities();

            var user = db.Users.Where(u => u.PasswordSalt == api_key).FirstOrDefault();

            if (user != null) 
            {
                var order = new Order();

                db.Orders.Add
            }


        }

        public void finishOrder()
        {
            throw new NotImplementedException();
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
