using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace MvcMusicStore.Models
{
    public class OrderDetails
    {
        public int OrderDetailsID { get; set; }
        public int Number { get; set; }
        public double Preco { get; set; }

        public virtual Album Album { get; set; }
    }
}