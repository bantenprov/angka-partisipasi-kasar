## angka-partisipasi-kasar

[![Join the chat at https://gitter.im/angka-partisipasi-kasar/Lobby](https://badges.gitter.im/angka-partisipasi-kasar/Lobby.svg)](https://gitter.im/angka-partisipasi-kasar/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/angka-partisipasi-kasar/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/angka-partisipasi-kasar/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/angka-partisipasi-kasar/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/angka-partisipasi-kasar/build-status/master)

Angka partisipasi kasar (APK)

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/angka-partisipasi-kasar:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/angka-partisipasi-kasar:v0.1.0
```


## download via github
~~~
bash
$ git clone https://github.com/bantenprov/angka-partisipasi-kasar.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\APKasar\APKasarServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=ap-kasar-assets
$ php artisan vendor:publish --tag=ap-kasar-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/ap-kasar',
    components: {
      main: resolve => require(['./components/views/bantenprov/ap-kasar/DashboardAPKasar.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "AP Kasar"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/ap-kasar',
      components: {
        main: resolve => require(['./components/bantenprov/ap-kasar/APKasarAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "AP Kasar"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Angka partisipasi kasar',
          link: '/dashboard/ap-kasar',
          icon: 'fa fa-angle-double-right'
        }
  ]
},
//-- ...
~~~
      {
        name: 'Angka partisipasi kasar',
        link: '/admin/dashboard/ap-kasar',
        icon: 'fa fa-angle-double-right'
      },
~~~

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import APKasar from './components/bantenprov/ap-kasar/APKasar.chart.vue';
Vue.component('echarts-ap-kasar', APKasar);

import APKasarKota from './components/bantenprov/ap-kasar/APKasarKota.chart.vue';
Vue.component('echarts-ap-kasar-kota', APKasarKota);

import APKasarTahun from './components/bantenprov/ap-kasar/APKasarTahun.chart.vue';
Vue.component('echarts-ap-kasar-tahun', APKasarTahun);

import APKasarAdminShow from './components/bantenprov/ap-kasar/APKasarAdmin.show.vue';
Vue.component('admin-view-ap-kasar-tahun', APKasarAdminShow);

//== Echarts Angka Partisipasi Kasar

import APKasarBar01 from './components/views/bantenprov/ap-kasar/APKasarBar01.vue';
Vue.component('ap-kasar-bar-01', APKasarBar01);

import APKasarBar02 from './components/views/bantenprov/ap-kasar/APKasarBar02.vue';
Vue.component('ap-kasar-bar-02', APKasarBar02);

//== mini bar charts
import APKasarBar03 from './components/views/bantenprov/ap-kasar/APKasarBar03.vue';
Vue.component('ap-kasar-bar-03', APKasarBar03);

import APKasarPie01 from './components/views/bantenprov/ap-kasar/APKasarPie01.vue';
Vue.component('ap-kasar-pie-01', APKasarPie01);

import APKasarPie02 from './components/views/bantenprov/ap-kasar/APKasarPie02.vue';
Vue.component('ap-kasar-pie-02', APKasarPie02);

//== mini pie charts
import APKasarPie03 from './components/views/bantenprov/ap-kasar/APKasarPie03.vue';
Vue.component('ap-kasar-pie-03', APKasarPie03);
```
