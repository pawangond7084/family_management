<!-- Loader Overlay -->
<div id="formLoader">
  <div class="loader-container">
    <div class="ring"></div>
    <span class="loading-text">LOADING...</span>
  </div>
</div>

<style>
/* Fullscreen overlay */
#formLoader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #000; /* Black background */
  display: none; /* Hidden by default */
  justify-content: center;
  align-items: center;
  z-index: 999999;
}

/* Loader wrapper */
.loader-container {
  position: relative;
  width: 140px;
  height: 140px;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* The thin rotating ring */
.ring {
  position: absolute;
  width: 140px;
  height: 140px;
  border-radius: 50%;
  border: 2px solid transparent;
  border-top: 2px solid #ff0080;
  border-right: 2px solid #00ffff;
  border-bottom: 2px solid #8000ff;
  border-left: 2px solid #ff0080;
  animation: spin 1.5s linear infinite;
}

/* Center text */
.loading-text {
  position: absolute;
  color: white;
  font-size: 1rem;
  letter-spacing: 2px;
  font-family: "Arial", sans-serif;
  font-weight: 600;
}

/* Rotation animation */
@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}
</style>

<script>
function showLoader() {
  document.getElementById("formLoader").style.display = "flex";
}
function hideLoader() {
  document.getElementById("formLoader").style.display = "none";
}
</script>
