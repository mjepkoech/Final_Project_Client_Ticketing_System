<script>
    import Vue from 'vue';

    Vue.component('side-bar', require('./partials/sidebar.vue'));
    Vue.component('landing-section', require('./partials/landing.vue'));

    export default {

    }
</script>
<template>
<div class="app-dashboard shrink-medium">
  <div class="row expanded app-dashboard-top-nav-bar">
  </div>

  <div class="app-dashboard-body off-canvas-wrapper">
    <div id="app-dashboard-sidebar" class="app-dashboard-sidebar position-left off-canvas off-canvas-absolute reveal-for-medium" data-off-canvas>
      <div class="app-dashboard-sidebar-title-area">
        <div class="app-dashboard-close-sidebar">
          <h3 class="app-dashboard-sidebar-block-title">Items</h3>
          <!-- Close button -->
          <button id="close-sidebar" data-app-dashboard-toggle-shrink class="app-dashboard-sidebar-close-button show-for-medium" aria-label="Close menu" type="button">
            <span aria-hidden="true"><a href=""><i class="large fa fa-angle-double-left"></i></a></span>
          </button>
        </div>
      </div>

      <div class="app-dashboard-sidebar-inner">
          <side-bar></side-bar>
      </div>

    </div>

    <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>
       <landing-section></landing-section>
    </div>

  </div>
</div>

</template>

<style lang="scss" scoped>

.app-dashboard {
  height: 100vh;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column;
}

.app-dashboard-body {
  -webkit-flex: 1 1 auto;
      -ms-flex: 1 1 auto;
          flex: 1 1 auto;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
}

.app-dashboard-top-nav-bar {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
  background: #2c3840;
  height: 55px;
  width: 100%;
  -webkit-flex: 0 0 55px;
      -ms-flex: 0 0 55px;
          flex: 0 0 55px;
}

.app-dashboard-top-nav-bar .menu-icon {
  vertical-align: text-bottom;
}

.app-dashboard-logo {
  color: #fefefe;
  text-transform: uppercase;
  font-weight: bold;
}

.app-dashboard-top-bar-actions {
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
}

.app-dashboard-top-bar-actions button {
  margin-bottom: 0;
  margin-right: 2rem;
}

.app-dashboard-top-bar-actions button.hollow {
  border-color: #fefefe;
  color: #fefefe;
}

.app-dashboard-top-bar-actions button.hollow:hover {
  background: #fefefe;
  color: #1779ba;
}

.app-dashboard-top-bar-actions .fa-info-circle {
  color: #fefefe;
  font-size: 1.5rem;
}

.app-dashboard-sidebar {
  background-color: #fefefe;
  height: 100%;
  overflow-x: visible;
  overflow-y: auto;
  z-index: 1;
  transition: all 0.5s ease;
}

.app-dashboard-sidebar .app-dashboard-open-sidebar, .app-dashboard-sidebar .app-dashboard-close-sidebar {
  -webkit-align-items: baseline;
      -ms-flex-align: baseline;
          align-items: baseline;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-justify-content: space-between;
      -ms-flex-pack: justify;
          justify-content: space-between;
  padding: 2rem 1rem;
}

.app-dashboard-sidebar .app-dashboard-sidebar-close-button {
  font-size: 14px;
}

.app-dashboard-sidebar .app-dashboard-sidebar-inner {
  height: 100%;
  overflow-x: hidden;
  overflow-y: auto;
}

.app-dashboard-sidebar .app-dashboard-sidebar-inner .menu > li > a {
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
}

.app-dashboard-sidebar .fa.large {
  font-size: 1.5rem;
  width: 40px;
}

.reveal-for-medium .app-dashboard-open-sidebar {
  display: none;
}

.app-dashboard-sidebar-footer {
  background: rgba(42, 57, 79, 0.8);
  bottom: 0;
  left: 0;
  padding: 1rem;
  position: absolute;
  width: 100%;
}

.app-dashboard-open-sidebar {
  text-align: center;
}

.app-dashboard-body-content {
  transition: all 0.5s ease;
  overflow-y: auto;
  -webkit-flex: 1 1 0;
      -ms-flex: 1 1 0px;
          flex: 1 1 0;
  padding: 20px;
  background-color: #fefefe;
}

</style>