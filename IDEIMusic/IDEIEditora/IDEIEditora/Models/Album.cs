using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace IDEIEditora.Models
{
    public class Album
    {
        public int AlbumID { get; set; }

        [Required]
        [StringLength(50, ErrorMessage="Titlhe should 50 characters or less")]
        public string Title { get; set; }

        [Range(0.1,float.MaxValue)]
        public float Price { get; set; }

        [DataType(DataType.Url)]
        public string AlbumArtUrl { get; set; }

        public int GenreID { get; set; }

        public int ArtistID { get; set; }

        public virtual Genre Genre { get; set; }

        public virtual Artist Artist { get; set; }


    }
}