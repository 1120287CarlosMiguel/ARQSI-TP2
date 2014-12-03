using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel;
using System.ComponentModel.DataAnnotations;

namespace IDEIEditora.Models
{
    public class Album
    {
        public int AlbumID { get; set; }

        [Required]
        [StringLength(50, ErrorMessage = "Titlhe should 50 characters or less")]
        public string Title { get; set; }

        [Range(0.1, double.MaxValue)]
        public double Price { get; set; }

        [DataType(DataType.Url)]
        public string AlbumArtUrl { get; set; }

        public string Genre { get; set; }

        public string Artist { get; set; }

        public virtual ICollection<OrderDetail> OrderDetails { get; set; }
    }
}