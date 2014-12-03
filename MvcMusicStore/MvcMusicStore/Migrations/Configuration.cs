using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;
using MvcMusicStore.Models;
namespace MvcMusicStore.Migrations
{
    using System;
    using System.Data.Entity;
    using System.Data.Entity.Migrations;
    using System.Linq;

    internal sealed class Configuration : DbMigrationsConfiguration<MvcMusicStore.DAL.MusicStoreContext>
    {
        public Configuration()
        {
            AutomaticMigrationsEnabled = false;
        }

        protected override void Seed(MvcMusicStore.DAL.MusicStoreContext context)
        {
            var albuns = new List<Album>
            {
            new Album { Title = "...And Justice For All", Genre =  "Metal", Price = 8.99, Artist = "Metallica"}, new Album{ Title = "The Lumineers", Genre =  "Rock", Price = 8.99, Artist = "The Lumineers"}, new Album{ Title = "The Southern Harmony and Musical Companion", Genre =  "Blues", Price = 8.99, Artist = "The Black Crowes"}, new Album{ Title = "The Spade", Genre =  "Rock", Price = 8.99, Artist = "Butch Walker & The Black Widows"}, new Album{ Title = "The Stone Roses", Genre =  "Rock", Price = 8.99, Artist = "The Stone Roses"}, new Album{ Title = "The Suburbs", Genre =  "Indie", Price = 8.99, Artist = "Arcade Fire"}, new Album{ Title = "The Three Tenors Disc1/Disc2", Genre =  "Classical", Price = 8.99, Artist = "Carreras, Pavarotti, Domingo"}, new Album{ Title = "The Trees They Grow So High", Genre =  "Classical", Price = 8.99, Artist = "Sarah Brightman"}, new Album{ Title = "The Wall", Genre =  "Rock", Price = 8.99, Artist = "Pink Floyd"}, new Album{ Title = "Them Crooked Vultures", Genre =  "Rock", Price = 8.99, Artist = "Them Crooked Vultures"}, new Album{ Title = "This Is Happening", Genre =  "Rock", Price = 8.99, Artist = "LCD Soundsystem"}, new Album{ Title = "Thunder, Lightning, Strike", Genre =  "Rock", Price = 8.99, Artist = "The Go! Team"}, new Album{ Title = "Time to Say Goodbye", Genre =  "Classical", Price = 8.99, Artist = "Sarah Brightman"}, new Album{ Title = "Time, Love & Tenderness", Genre =  "Pop", Price = 8.99, Artist = "Michael Bolton"}, new Album{ Title = "Tomorrow Starts Today", Genre =  "Rock", Price = 8.99, Artist = "Mobile"}, new Album{ Title = "Tuesday Night Music Club", Genre =  "Alternative", Price = 8.99, Artist = "Sheryl Crow"}, new Album{ Title = "Umoja", Genre =  "Rock", Price = 8.99, Artist = "BLØF"}, new Album{ Title = "Under the Pink", Genre =  "Alternative", Price = 8.99, Artist = "Tori Amos"}, new Album{ Title = "Undertow", Genre =  "Rock", Price = 8.99, Artist = "Tool"}, new Album{ Title = "Untrue", Genre =  "Electronic", Price = 8.99, Artist = "Burial"}, new Album{ Title = "Use Your Illusion I", Genre =  "Rock", Price = 8.99, Artist = "Guns N' Roses"}, new Album{ Title = "Use Your Illusion II", Genre =  "Rock", Price = 8.99, Artist = "Guns N' Roses"}, new Album{ Title = "Version 2.0", Genre =  "Alternative", Price = 8.99, Artist = "Garbage"}, new Album{ Title = "Wapi Yo", Genre =  "World", Price = 8.99, Artist = "Lokua Kanza"}, new Album{ Title = "Wasteland Discotheque", Genre =  "Rock", Price = 8.99, Artist = "Raunchy"}, new Album{ Title = "Watermark", Genre =  "Electronic", Price = 8.99, Artist = "Enya"}, new Album{ Title = "We Were Exploding Anyway", Genre =  "Rock", Price = 8.99, Artist = "65daysofstatic"}, new Album{ Title = "White Pony", Genre =  "Rock", Price = 8.99, Artist = "Deftones"}, new Album{ Title = "Who's Next", Genre =  "Rock", Price = 8.99, Artist = "The Who"}, new Album{ Title = "Wish You Were Here", Genre =  "Rock", Price = 8.99, Artist = "Pink Floyd"}, new Album{ Title = "With Oden on Our Side", Genre =  "Metal", Price = 8.99, Artist = "Amon Amarth"}, new Album{ Title = "Worship Music", Genre =  "Metal", Price = 8.99, Artist = "Anthrax"}, new Album{ Title = "X&Y", Genre =  "Rock", Price = 8.99, Artist = "Coldplay"}, new Album{ Title = "Xinti", Genre =  "World", Price = 8.99, Artist = "Sara Tavares"}, new Album{ Title = "Yano", Genre =  "Rock", Price = 8.99, Artist = "Yano"}, new Album{ Title = "Yesterday Once More Disc 1/Disc 2", Genre =  "Pop", Price = 8.99, Artist = "The Carpenters"}, new Album{ Title = "Zoso", Genre =  "Rock", Price = 8.99, Artist = "Led Zeppelin"}, new Album{ Title = "עד גבול האור", Genre =  "World", Price = 8.99, Artist = "אריק אינשטיין"}
            };

            albuns.ForEach(s=>context.Albuns.AddOrUpdate(p=>p.Title,s));

            context.SaveChanges();
        }
    }
}
