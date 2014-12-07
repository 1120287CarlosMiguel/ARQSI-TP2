﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;

namespace MvcMusicStore
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the interface name "IEditoraWebService" in both code and config file together.
    [ServiceContract]
    public interface IEditoraWebService
    {
        [OperationContract]
        void DoWork();

        [OperationContract]
        string GetAPI_Key(string username, string password);

        [OperationContract]
        string GetCatalogo();

        [OperationContract]
        int CreateOrder();

        [OperationContract]
        void finishOrder();
    }
}
