﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace IDEIEditora.Models
{
    public class OrderDetail
    {
        public int OrderDetailID { get; set; }

        [Range(0,int.MaxValue)]
        public int Quantity { get; set; }

        [Range(0.0,float.MaxValue)]
        public float Price { get; set; }

        public int OrderID { get; set; }

        public int AlbumID { get; set; }

        public virtual Order Order { get; set; }

        public virtual Album Album { get; set; }
    }
}