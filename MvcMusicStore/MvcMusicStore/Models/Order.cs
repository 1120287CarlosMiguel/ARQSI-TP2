using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace MvcMusicStore.Models
{
    public class Order
    {
        public int OrderID { get; set; }
        public double Total {get; set;}


        public virtual ICollection<OrderDetails> Orders { get; set; }
    }
}