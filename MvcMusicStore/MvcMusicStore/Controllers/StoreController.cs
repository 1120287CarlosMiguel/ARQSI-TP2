using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using MvcMusicStore.Models;

namespace MvcMusicStore.Controllers
{
    public class StoreController : Controller
    {
        //
        // GET: /Store/

        MusicStoreContext storeDB = new MusicStoreContext();

        public ActionResult Index()
        {
            var genres = storeDB.Albuns.ToList();
            return View(genres);
        }

        //
        // GET: /Store/Browse
        public ActionResult Browse(string genre)
        {
            var album = new Album { genero = genre };
            return View(album);
        }
        //
        // GET: /Store/Details
        public ActionResult Details(int id)
        {
           //_____ Album ou var
            var album = new Album { title = "Album " + id };
            return View(album);
        }

    }
}
