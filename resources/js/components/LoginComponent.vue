
<template >
  <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-screen bg-gray-100">
    <div
      class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6"
    >
      <div
        class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0"
      >
        <img
          src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="w-full"
          alt="Sample image"
        />
      </div>
      <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0 bg-white border border-solid p-10 shadow-lg">
      <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-3 mb-1 text-3xl font-bold tracking-tight text-gray-900 text-center">NRCP Outreach Program</h2>
        <p class="text-center text-gray-500 mb-6">Sign in to your account</p>
      </div>
        <form>
          <!-- Email input -->
          <div class="mb-3">
            <input
              type="text"
              class="form-control block w-full px-4 py-2 text-xl font-normal rounded-md text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm  md:text-md lg:text-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:outline-none" 
              placeholder="Email address"
            />
          </div>

          <!-- Password input -->
          <div class="mb-3">
            <input
              type="password"
              class="form-control block w-full px-4 py-2 text-xl font-normal rounded text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm  md:text-md lg:text-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:outline-none"
              id="exampleFormControlInput2"
              placeholder="•••••••••"
            />
          </div>

          <div class="flex justify-between items-center mb-6">
            <div class="form-group form-check">
              <input
                type="checkbox"
                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-indigo-600 checked:border-indigo-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                id="exampleCheck2"
              />
              <label class="form-check-label inline-block text-gray-800" for="exampleCheck2"
                >Remember me</label
              >
            </div>
            <a href="#!" class="text-gray-800">Forgot password?</a>
          </div>

          <div class="text-center lg:text-left">
            <button
              type="button"
              class="w-full inline-block px-7 py-3 bg-indigo-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out" 
            >
              Login
            </button>

            <!-- <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>
            
            <button
              type="button"
              class="w-full inline-block px-7 py-3 bg-green-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
            >
              REGISTER
            </button> -->

            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
              Don't have an account?
              <a
                href="/register"
                target="_blank"
                class="text-indigo-600 hover:text-indigo-700 focus:text-indigo-700 transition duration-200 ease-in-out"
                >Register</a
              >
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

