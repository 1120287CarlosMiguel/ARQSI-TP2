using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace IDEIEditora.Models
{
    public class ShoppingCart
    {
        public List<CartLineItem> LineItems { get; set; }

        public int TotalProd { get; set; }

        public float TotalCost { get; set; }
    }
}