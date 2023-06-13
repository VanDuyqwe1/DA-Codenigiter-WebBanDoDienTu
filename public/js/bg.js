import * as THREE from 'three';
import WebGL from 'three/addons/capabilities/WebGL.js';
import { OrbitControls } from '/node_modules/three/examples/jsm/controls/OrbitControls.js';
import { GLTFLoader } from '/node_modules/three/examples/jsm/loaders/GLTFLoader.js';
// import { TextGeometry } from '/node_modules/three/examples/jsm/geometries/TextGeometry.js';


if (WebGL.isWebGLAvailable()) {

  const glb = document.querySelector('.glb3d');
  // const txt = document.querySelector('.txt');
  const webCar = document.querySelector('.webCar');

  // Khung cảnh 1
  // Tạo một đối tượng Scene
  var scene = new THREE.Scene();
  // Tạo camera
  const camera = new THREE.PerspectiveCamera(60, window.clientWidth / window.clientHeight, 1, 1000);
  camera.position.z = 1;
  camera.position.x = 1.16;
  camera.position.y = -0.12;
  camera.position.z = 0.27;

  let ambient = new THREE.AmbientLight(0x555555);
  
  // Tạo một Renderer
  var renderer = new THREE.WebGLRenderer({
    canvas: webCar
  });
  renderer.domElement.style.position = 'absolute';
  renderer.domElement.style.left = '500px';
  renderer.domElement.style.top = '100px';
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

//   assetLoader.load('/public/assets/10.glb', function (glb) {
//     // console.log(glb);
//     glb.scene.scale.set(1.2 ,1.2, 1.2);
    
//     // glb.scene.position.z = 5;
//     root = glb.scene;
//     scene.add(root);

//   }, function (xhr) {
//     console.log((xhr.loaded / xhr.total * 100) + "% loaded");
//   }, function (erorr) {
//     console.log('An error');
//   });


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
