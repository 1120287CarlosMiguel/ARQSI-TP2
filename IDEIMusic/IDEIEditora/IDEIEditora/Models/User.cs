﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace IDEIEditora.Models
{

    public abstract class User
    {

        [DatabaseGenerated(DatabaseGeneratedOption.None)]
        [Display(Name="Username")]
        public string UserID { get; set; }

        [StringLength(16, ErrorMessage = "Password must be 16 characters or less"), MinLength(6, ErrorMessage = "Password must be 16 characters or more")]
        public string Password { get; set; }

        [Required]
        [DataType(DataType.EmailAddress,ErrorMessage="Não inseriu um email válido")]
        public string Email { get; set; }

        [DataType(DataType.PhoneNumber)]
        public string PhoneNumber { get; set; }
    }
}