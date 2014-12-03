using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;
using MvcMusicStore.Models;
using System.Data.Entity.ModelConfiguration.Conventions;

namespace MvcMusicStore.DAL
{
    public class MusicStoreContext : DbContext
    {
        public DbSet<Album> Albuns { get; set; }
        public DbSet<Order> Orders { get; set; }
        public DbSet<OrderDetails> OrdersDetails { get; set; }

        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {
            modelBuilder.Conventions.Remove<PluralizingTableNameConvention>();
        }
    }
}