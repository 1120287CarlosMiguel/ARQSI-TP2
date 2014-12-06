using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using System.Web.Script.Serialization;
using MvcMusicStore.Models;
using System.ServiceModel.Activation;
using Newtonsoft.Json;

namespace MvcMusicStore
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the class name "EditoraWebService" in code, svc and config file together.
    // NOTE: In order to launch WCF Test Client for testing this service, please select EditoraWebService.svc or EditoraWebService.svc.cs at the Solution Explorer and start debugging.
    [AspNetCompatibilityRequirements(
            RequirementsMode = AspNetCompatibilityRequirementsMode.Allowed)]
    public class EditoraWebService : IEditoraWebService
    {
        public void DoWork()
        {
        }

        public string GetCatalogo(string value)
        {

            MusicStoreEntities db = new MusicStoreEntities();

            List<Album> albuns = db.Albums.ToList();

            string json = JsonConvert.SerializeObject(albuns,Formatting.Indented);

            return json;
        }
    }
}
