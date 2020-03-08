			var camera, scene, renderer;
			var effect, controls;
			var container;
			var tempUlr = WPURLS.siteurl+"/images/360img/";
			console.log(tempUlr);


			function init(container) {

				var container, mesh;

				camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 1, 1100 );
				camera.position.set(0.1,0.1,0.1);
				camera.target = new THREE.Vector3( 0, 0, 0 );

				scene = new THREE.Scene();

				var geometry = new THREE.SphereGeometry( 500, 60, 40 );
				geometry.scale( - 1, 1, 1 );

				var material = new THREE.MeshBasicMaterial( {
					map: new THREE.TextureLoader().load( tempUlr+'3.jpg' )
				} );

				mesh = new THREE.Mesh( geometry, material );

				scene.add( mesh );

				renderer = new THREE.WebGLRenderer();
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				container.appendChild( renderer.domElement );

				effect = new THREE.StereoEffect(renderer);

				//
		      	controls = new THREE.OrbitControls(camera, renderer.domElement);
		      	controls.autoRotate = true;
		      	controls.enableZoom = false;
		      	controls.enablePan = false;

			    function setOrientationControls(e) {
			        if (!e.alpha) {
			          return;
			        }

		        	controls = new THREE.DeviceOrientationControls(camera, true);
		        	controls.connect();

		        	renderer.domElement.addEventListener('click', fullscreen, false);

		        	window.removeEventListener('deviceorientation', setOrientationControls, true);
		      	}
		      	window.addEventListener('deviceorientation', setOrientationControls, true);
				window.addEventListener( 'resize', onWindowResize, false );
			}
			function fullscreen() {
			    if (container.requestFullscreen) {
			      container.requestFullscreen();
			    }else if (container.msRequestFullscreen) {
	   		    	container.msRequestFullscreen();
			    }else if (container.mozRequestFullScreen) {
			    	container.mozRequestFullScreen();
			    }else if (container.webkitRequestFullscreen) {
			       	container.webkitRequestFullscreen();
			    }
		    }
			function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );
				effect.setSize( window.innerWidth, window.innerHeight );

			}

			function animate() {
				requestAnimationFrame( animate );
				update();
			}
			function update() {
				controls.update();
				renderer.render( scene, camera );
				//effect.render(scene, camera);

			}

