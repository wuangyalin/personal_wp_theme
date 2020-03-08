var container;
var camera, scene, renderer;
var mesh, geometry, material;

var mouseX = 0,
    mouseY = 0;
var start_time = Date.now();

var windowHalfX = window.innerWidth / 2;
var windowHalfY = window.innerHeight / 2;

var tempUlr = WPURLS.siteurl + "/images/custom_images/";
init(container);

function init(container) {
    //
    camera = new THREE.PerspectiveCamera(30, window.innerWidth / window.innerHeight, 1, 30000);
    camera.position.z = 6000;

    scene = new THREE.Scene();

    geometry = new THREE.Geometry();

    //light
    var light = new THREE.AmbientLight(0x404040); // soft white light
    scene.add(light);

    var texture = THREE.ImageUtils.loadTexture(tempUlr + 'cloud10.png', null, animate);
    texture.magFilter = THREE.LinearMipMapLinearFilter;
    texture.minFilter = THREE.LinearMipMapLinearFilter;

    var fog = new THREE.Fog(0xaaaaaa, -100, 3000);

    material = new THREE.ShaderMaterial({

        uniforms: {

            "map": { type: "t", value: texture },
            "fogColor": { type: "c", value: fog.color },
            "fogNear": { type: "f", value: fog.near },
            "fogFar": { type: "f", value: fog.far },
        },
        vertexShader: document.getElementById('vs').textContent,
        fragmentShader: document.getElementById('fs').textContent,
        depthWrite: false,
        depthTest: false,
        transparent: true

    });

    var plane = new THREE.Mesh(new THREE.PlaneGeometry(64, 64));

    for (var i = 0; i < 8000; i++) {
        plane.position.x = Math.random() * 1000 - 500;
        plane.position.y = -Math.random() * Math.random() * 200 - 15;
        plane.position.z = i;
        plane.rotation.z = Math.random() * Math.PI;
        plane.scale.x = plane.scale.y = Math.random() * Math.random() * 1.5 + 0.5;

        plane.updateMatrix();
        geometry.merge(plane.geometry, plane.matrix);
    }

    mesh = new THREE.Mesh(geometry, material);
    scene.add(mesh);

    mesh = new THREE.Mesh(geometry, material);
    mesh.position.z = -8000;
    //scene.add( mesh );

    renderer = new THREE.WebGLRenderer({ antialias: false });
    renderer.setClearColor(0x000);

    renderer.setSize(window.innerWidth, window.innerHeight);
    container.appendChild(renderer.domElement);
    //var controls = new THREE.OrbitControls( camera, renderer.domElement );


    createMoon();

    document.addEventListener('mousemove', onDocumentMouseMove, false);
    window.addEventListener('resize', onWindowResize, false);

}

function newMat() {
    return new THREE.MeshStandardMaterial({
        roughness: 0.8,
        color: 0xffffff,
        metalness: 0.2,
        bumpScale: 0.0005,
        envMap: cubeMap,
    });
}

function createMoon() {

    var vertexShader = document.getElementById('vertexShader').text;
    var fragmentShader = document.getElementById('fragmentShader').text;
    material = new THREE.ShaderMaterial({
        vertexShader: vertexShader,
        fragmentShader: fragmentShader,
    });

    var geometry = new THREE.SphereGeometry(500, 50, 50);
    moon = new THREE.Mesh(geometry, material);
    moon.position.y = 400;
    moon.position.z = 3000;
    scene.add(moon);

    var light = new THREE.AmbientLight(0x404040); // soft white light
    scene.add(light);

    var directionalLight = new THREE.DirectionalLight(0xffffff);
    directionalLight.position.set(1, 1, 1).normalize();
    scene.add(directionalLight);
}

function onDocumentMouseMove(event) {
    mouseX = (event.clientX - windowHalfX) * 0.25;
    mouseY = (event.clientY - windowHalfY) * 0.15;
}

function onWindowResize(event) {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
}

function animate() {

    requestAnimationFrame(animate);

    position = ((Date.now() - start_time) * 0.03) % 8000;

    camera.position.x += (mouseX - camera.position.x) * 0.01;
    camera.position.y += (-mouseY - camera.position.y) * 0.01;
    camera.position.z = -position + 8000;

    renderer.render(scene, camera);

    moon.rotation.x += 0.001;
}