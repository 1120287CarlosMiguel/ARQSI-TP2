using Newtonsoft.Json;
using System.Collections.Generic;
using System.Runtime.Serialization;

namespace MvcMusicStore.Models
{
    public class Artist
    {
        [JsonIgnore]
        public int ArtistId { get; set; }

        public string Name { get; set; }

        [JsonIgnore]
        public ICollection<Album> Albums { get; set; }
    }
}
