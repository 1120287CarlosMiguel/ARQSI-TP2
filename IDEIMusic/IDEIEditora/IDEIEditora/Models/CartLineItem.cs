using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace IDEIEditora.Models
{
    public class CartLineItem
    {

        public Album Album { get; set; }

        public int Quantity { get; set; }

        public float FinalPrice { get; set; }

    }
}