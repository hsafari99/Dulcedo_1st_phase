/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');
require("react-bootstrap");

//===================> Added By Hossein <=============================//
/**
* This import is for the bootstrap for the React 
* It is referenced through the below website address:
* https://react-bootstrap.github.io/getting-started/introduction/
* I mainly add it for having Modal show in REACT
*/
// import 'bootstrap/dist/css/bootstrap.min.css';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/ApplicationRegister');
// require('./components/ApplicationRegisterForm');