using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Mail;
using System.Web;

namespace MvcMusicStore.Models
{
    public class Mail
    {

        public SmtpClient client = new SmtpClient("smtp.gmail.com", 587)
        {
            Credentials = new NetworkCredential("ideieditora22@gmail.com", "K123456789K"),
            EnableSsl = true
        };

        public void Send (string email) {

            string mensagem = "Informa-se que efectuou uma encomenda na editora IDEIEditora na data "+DateTime.Now.ToString()+".\n Cumprimentos,\nIDEIEditora";

            MailMessage mes = new MailMessage("ideieditora22@gmail.com",email,"Encomenda a editora",mensagem);

            client.Send(mes);
        }

    }
}