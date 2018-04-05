// import external dependencies
import 'jquery';
// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

//headroom
import Headroom from 'headroom.js/dist/headroom';


$(function() {
  let header = document.querySelector('header.banner');
  let headroom = new Headroom(header, {
    'offset': 205,
    'tolerance': 5,
    'classes': {
      'initial': 'headroom',
      'pinned': 'headroom--pinned',
      'unpinned': 'headroom--unpinned',
    },
  });
  headroom.init();
});

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
