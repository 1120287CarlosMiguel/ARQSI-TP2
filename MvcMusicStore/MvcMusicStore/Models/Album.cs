using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations.Schema;

namespace MvcMusicStore.Models
{
    public class Album
    {
        [DatabaseGenerated(DatabaseGeneratedOption.None)]
        public int albumID { get; set; }
        public string title { get; set; }
        public double price { get; set; }
        public string artist { get; set; }
        public string genero { get; set; }
    }
}