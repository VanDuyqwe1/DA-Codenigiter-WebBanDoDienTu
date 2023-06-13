import * as THREE from 'three';
import WebGL from 'three/addons/capabilities/WebGL.js';
import { OrbitControls } from '/node_modules/three/examples/jsm/controls/OrbitControls.js';
import { GLTFLoader } from '/node_modules/three/examples/jsm/loaders/GLTFLoader.js';
// import { TextGeometry } from '/node_modules/three/examples/jsm/geometries/TextGeometry.js';

// console.log("day ne");

// const $ = document.querySelector.bind(document);
// const $$ = document.querySelectorAll.bind(document);
// const tabs = $$(".tab-item");
// const panes = $$(".tab-pane");

// const tabActive = $(".tab-item.active");
// const line = $(".tabs .line");


// requestIdleCallback(function () {
//   line.style.left = tabActive.offsetLeft + "px";
//   line.style.width = tabActive.offsetWidth + "px";
// });

// tabs.forEach((tab, index) => {
//   const pane = panes[index];

//   tab.onclick = function () {
//     $(".tab-item.active").classList.remove("active");
//     $(".tab-pane.active").classList.remove("active");

//     line.style.left = this.offsetLeft + "px";
//     line.style.width = this.offsetWidth + "px";

//     this.classList.add("active");
//     pane.classList.add("active");
//   };
// });




if (WebGL.isWebGLAvailable()) {

  const glb = document.querySelector('.glb3d');
  // const txt = document.querySelector('.txt');
  const webCar = document.querySelector('.webCar');

  // Khung cảnh 1
  // Tạo một đối tượng Scene
  var scene = new THREE.Scene();
  // Tạo camera
  const camera = new THREE.PerspectiveCamera(75, glb.clientWidth / glb.clientHeight, 0.1, 1000);
  camera.position.z = 5;
  // Tạo một Renderer
  var renderer = new THREE.WebGLRenderer({
    canvas: webCar
  });
  renderer.domElement.style.position = 'absolute';
  renderer.domElement.style.left = '0px';
  renderer.domElement.style.top = '0px';
  renderer.setSize(glb.clientWidth, glb.clientHeight);
  // Thêm renderer vào container
  glb.appendChild(renderer.domElement);



  // Tạo geometry và material cho đối tượng nền
  var geometry = new THREE.PlaneGeometry(200, 200);
  var material = new THREE.MeshBasicMaterial({ color: 0xffffff, transparent: true, opacity: 0.5 });
  
  // Tạo mesh từ geometry và material
  var plane = new THREE.Mesh(geometry, material); 
  renderer.setClearAlpha(0); 
  // Thêm mesh vào scene
  scene.add(plane);
 


  var orbit = new OrbitControls(camera, renderer.domElement);


  var root = null;
  var assetLoader = new GLTFLoader();

  var valueId = document.getElementById("id").getAttribute("value");
  // alert(receivedVariable);
  var nameGlbById = valueId;
  // if (valueId) {
    
  // }

  assetLoader.load('/public/assets/'+ nameGlbById +'.glb', function (glb) {
    // console.log(glb);
    glb.scene.scale.set(1 ,1, 1);
    
    // glb.scene.position.z = 5;
    root = glb.scene;
    scene.add(root);

  }, function (xhr) {
    console.log((xhr.loaded / xhr.total * 100) + "% loaded");
  }, function (erorr) {
    console.log('An error');
  });


  //Tạo một HemisphereLight (ánh sáng bán cầu)
  var hemisphereLight = new THREE.HemisphereLight(0xaaaaaa, 0x000000, 0.9);
  scene.add(hemisphereLight);

  // Tạo một DirectionalLight (ánh sáng hướng)
  var directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
  directionalLight.position.set(5, 3, 5);
  scene.add(directionalLight);






  // Hàm vòng lặp render
  function animate() {
    requestAnimationFrame(animate);
    // orbit.update();
    // Quay hình hộp
    // cube2.rotation.y += 0.01;
    // cube2.rotation.z += 0.01;
    root.rotation.y += 0.01;

    renderer.render(scene, camera);
    // renderer.render(scene2, camera2);
  }
  

  // Gọi hàm animate để bắt đầu vòng lặp render
  animate();

} else {

  const warning = WebGL.getWebGLErrorMessage();
  document.getElementById('container').appendChild(warning);

}
