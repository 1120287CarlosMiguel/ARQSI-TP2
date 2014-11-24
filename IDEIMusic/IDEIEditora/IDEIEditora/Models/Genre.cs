using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace IDEIEditora.Models
{
    public class Genre
    {

        public int GenreID { get; set; }

        [StringLength(30, ErrorMessage = "Genre Name shoul have 30 characters or less.")]
        public string Name { get; set; }

        public virtual ICollection<Album> Albums { get; set; }



    }
}