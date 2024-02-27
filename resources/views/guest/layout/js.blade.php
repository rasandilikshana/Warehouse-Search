<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"
    integrity="sha512-gmwBmiTVER57N3jYS3LinA9eb8aHrJua5iQD7yqYCKa5x6Jjc7VDVaEA0je0Lu0bP9j7tEjV3+1qUm6loO99Kw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    gsap.fromTo(
    ".loading-page",
    { opacity: 1 },
    {
      opacity: 0,
      display: "none",
      duration: 0.25,
      delay: 1.25,
    }
  );

  gsap.fromTo(
    ".logo-name",
    {
      y: 50,
      opacity: 0,
    },
    {
      y: 0,
      opacity: 1,
      duration: 0.5,
      delay: 0.125,
    }
  );
</script>

