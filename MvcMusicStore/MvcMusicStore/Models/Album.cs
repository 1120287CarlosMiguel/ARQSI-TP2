using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;

namespace MvcMusicStore.Models
{
    public class Album
    {
        public int AlbumID { get; set; }
        [StringLength(50, ErrorMessage = "Title name cannot be longer than 50 characters.")]
        
        public string Title { get; set; }

        public double Price { get; set; }

        public string Artist { get; set; }

        [StringLength(50, ErrorMessage = "Genre name cannot be longer than 50 characters.")]
        public string Genre { get; set; }

    }
}