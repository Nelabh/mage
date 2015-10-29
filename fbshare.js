
window.fbAsyncInit = function() {
    FB.init({
      appId      : '859438717459698',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
//FB.init({appId: "859438717459698", status: true, cookie: true});
  function share_me() {
    FB.ui({
      method: 'feed',
      //app_id: '859438717459698',
      href: 'https://www.jssresume.parseapp.com',
      //picture: 'PIC_URL',
     // name: 'default app',
     // caption: 'its working',
      //description: 'shared'
    },
    function(response){
      if(response && response.post_id) {
        self.location.href = 'https://www.tatynerds.com'
      }
      else {
        self.location.href = 'https://www.google.com'
      }
    });
  }
