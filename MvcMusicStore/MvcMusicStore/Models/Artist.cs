
using System.Collections.Generic;
namespace MvcMusicStore.Models
{
    public class Artist
    {
        public int ArtistId { get; set; }

        public string Name { get; set; }

        public virtual ICollection<Album> Albums { get; set; }
    }
}
