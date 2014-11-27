using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace IDEIEditora.Models
{
    public class WebUser
    {
        public User User { get; set; }

        public ShoppingCart Cart { get; set; }
    }
}