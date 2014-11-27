using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace IDEIEditora.Models
{
    public class MusicShop : User
    {
        public string Name { get; set; }

        public string City { get; set; }

        public string Country { get; set; }

        [Required]
        [DataType(DataType.Url)]
        public string URL { get; set; }

        /**
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        private string API_key { get; }
        **/

        public virtual ICollection<Order> Orders { get; set; }
    }
}