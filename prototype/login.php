<?php
include("global.php"); // call mailbox class, mailbox function, test connection function, GetMessages 
include("header.php"); // Loads basic HTML header, starts finishes <head> and starts <body>
?>
 <form action="login_process.php" method="POST" id="login">
      <section class="py-10 lg:py-20 bg-gray-800">
        <div class="container mx-auto px-4">
          <div class="max-w-xl mx-auto">
            <div class="mb-10">
            </div>
            <div class="p-6 lg:p-12 mb-6 bg-gray-900 shadow-md rounded">
              <div class="mb-6">
                <span class="text-gray-500">Already a member?</span>
                <h3 class="text-2xl font-bold text-white">Sign In</h3>

                <?php if ($_GET["error"]) {?>
                  <span style="color: red; font-size; 12em;">Invalid Login, please check your sign-in information.</span>

                <?php } ?>
              </div>
                <div class="flex flex-wrap -mx-2">
                  <div class="mb-3 w-full lg:w-1/2 px-2">
                    <input class="w-full p-4 text-xs text-gray-50 bg-gray-800 outline-none rounded" type="text" name="firstname" placeholder="First Name" value="John">
                  </div>
                  <div class="mb-3 w-full lg:w-1/2 px-2">
                    <input class="w-full p-4 text-xs text-gray-50 bg-gray-800 outline-none rounded" type="text" name="lastname" placeholder="Last Name" value="Doe">
                  </div>
                </div>
                <div class="mb-3 flex p-4 bg-gray-800 rounded">
                  <input class="w-full text-xs text-gray-50 bg-gray-800 outline-none" type="text" name="server" placeholder="" value="imap.gmail.com">
                  
                </div>                
                <div class="mb-3 flex p-4 bg-gray-800 rounded">
                  <input class="w-full text-xs text-gray-50 bg-gray-800 outline-none" type="email" placeholder="name@email.com" value="cse6214test@gmail.com" name="username">
                  <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                  </svg>
                </div>
                <div class="mb-6 flex p-4 bg-gray-800 rounded">
                  <input class="w-full text-xs text-gray-50 bg-gray-800 outline-none" type="password" placeholder="Enter your password" name="password" value="msstatems">
                  <button form="login">
                    <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                  </button>
                </div>
                <div class="text-center">
                  <input type="submit" class="mb-2 w-full py-4 bg-green-600 hover:bg-green-700 rounded text-sm font-bold text-gray-50 transition duration-200" value="Sign In">                </div>
            </div>
            <!-- <p class="text-xs text-center text-gray-400"><a class="underline hover:text-gray-500" href="#">Policy privacy</a> and <a class="underline hover:text-gray-500" href="#">Terms of Use</a></p> -->
          </div>
        </div>
      </section>
</form>
<?php
include("footer.php");
?>
