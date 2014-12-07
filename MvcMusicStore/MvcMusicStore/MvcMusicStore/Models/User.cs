using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace MvcMusicStore.Models
{
    public class User
    {
        
        public Guid UserId { get; set; }

        [Required]
        [StringLength(200, MinimumLength = 6)]
        [EmailAddress]
        [Display(Name = "Email address: ")]
        [Key]
        public string Email { get; set; }

        [Required]
        [DataType(DataType.Password)]
        [Display(Name = "Password: ")]
        public string Password { get; set; }

        public string PasswordSalt { get; set; }

        public virtual ICollection<Order> Orders { get; set; }
    }
}