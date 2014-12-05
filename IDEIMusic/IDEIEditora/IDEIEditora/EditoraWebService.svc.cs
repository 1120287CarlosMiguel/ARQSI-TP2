using IDEIEditora.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using System.Web.Script.Serialization;

namespace IDEIEditora
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the class name "EditoraWebService" in code, svc and config file together.
    // NOTE: In order to launch WCF Test Client for testing this service, please select EditoraWebService.svc or EditoraWebService.svc.cs at the Solution Explorer and start debugging.
    public class EditoraWebService : IEditoraWebService
    {
        #region IEditoraWebService Members

        public void DoWork()
        {
        }

        /**
         * Método que retorna JSON com informacao relativa aos discos vendidos pela editora.
         **/
        public string GetCatalogo(string value)
        {
            Album a1 = new Album();
            a1.AlbumID = 1;
            a1.Title = "Thriller";
            a1.Artist = "Michael Jackon";
            a1.Genre = "Pop";
            a1.Price = 5.0;
            a1.AlbumArtUrl = "http://upload.wikimedia.org/wikipedia/en/5/55/Michael_Jackson_-_Thriller.png";

            Album a2 = new Album();
            a2.AlbumID = 2;
            a2.Title = "Dark Side of The Moon";
            a2.Artist = "Pink Floyd";
            a2.Genre = "Rock";
            a2.Price = 13.0;
            a2.AlbumArtUrl = "http://upload.wikimedia.org/wikipedia/en/3/3b/Dark_Side_of_the_Moon.png";

            Album a3 = new Album();
            a3.AlbumID = 3;
            a3.Title = "Saturdat Night Fever";
            a3.Artist = "Bee Gees";
            a3.Genre = "Disco";
            a3.Price = 7.5;
            a3.AlbumArtUrl = "http://upload.wikimedia.org/wikipedia/en/0/0c/TheBeeGeesSaturdayNightFeveralbumcover.jpg";
            
            Album a4 = new Album();
            a4.AlbumID = 4;
            a4.Title = "The Bodyguard";
            a4.Artist = "Whitmey Houston";
            a4.Genre = "Rock";
            a4.Price = 14.5;
            a4.AlbumArtUrl = "http://upload.wikimedia.org/wikipedia/en/f/f3/TheBodyguardSoundtrack.jpg";

            Album a5 = new Album();
            a5.AlbumID = 5;
            a5.Title = "Back in Black";
            a5.Artist = "AC/DC";
            a5.Genre = "Rock";
            a5.Price = 6.5;
            a5.AlbumArtUrl = "http://upload.wikimedia.org/wikipedia/commons/b/be/Acdc_backinblack_cover.jpg";

            Album a6 = new Album();
            a6.AlbumID = 6;
            a6.Title = "Rumours";
            a6.Artist = "Fleetwood Mac";
            a6.Genre = "Soft Rock";
            a6.Price = 7.5;
            a6.AlbumArtUrl = "http://upload.wikimedia.org/wikipedia/en/f/fb/FMacRumours.PNG";

            Album a7 = new Album();
            a7.AlbumID = 7;
            a7.Title = "Come on Over";
            a7.Artist = "Shania Twain";
            a7.Genre = "Pop";
            a7.Price = 13.45;
            a7.AlbumArtUrl = "http://upload.wikimedia.org/wikipedia/en/6/61/Shania_Twain_-_Come_on_Over.png";

            var albuns = new List<Album>();
            albuns.Add(a1);
            albuns.Add(a2);
            albuns.Add(a3);
            albuns.Add(a4);
            albuns.Add(a5);
            albuns.Add(a6);
            albuns.Add(a7);

            var serializer = new JavaScriptSerializer();
            string json = serializer.Serialize(albuns);

            return json;
        }

        #endregion
    }
}
