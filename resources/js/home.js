//Index Page ( Sector Tab )
const tabs = document.querySelectorAll(".sector-tab");
const contents = document.querySelectorAll(".sector-content");

tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    tabs.forEach((t) => t.classList.remove("active"));
    contents.forEach((c) => c.classList.remove("active"));

    tab.classList.add("active");

    const target = tab.dataset.target;
    document.getElementById(target).classList.add("active");
  });
});

/* Index Page (Storage Tab) */

const items = document.querySelectorAll(".storage-item");

const video = document.getElementById("storage-video");
const videoSource = document.getElementById("storage-video-source");

items.forEach((item) => {
  const header = item.querySelector(".storage-header");
  const body = item.querySelector(".storage-body");

  header.addEventListener("click", () => {
    // close all
    items.forEach((i) => {
      i.classList.remove("active");
      i.querySelector(".storage-body").style.maxHeight = null;
    });

    // open clicked
    item.classList.add("active");
    body.style.maxHeight = body.scrollHeight + "px";

    // ✅ CHANGE VIDEO
    const newVideo = item.dataset.video;

    if (newVideo) {
      video.pause();
      videoSource.src = newVideo;
      video.load();
      video.play();
    }
  });
});

/* Default first open */

window.addEventListener("load", () => {
  const first = document.querySelector(".storage-item.active");
  const body = first.querySelector(".storage-body");

  body.style.maxHeight = body.scrollHeight + "px";
});
