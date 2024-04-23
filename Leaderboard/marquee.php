<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style>
	/* Marquee styles */
.marquee {
  --gap: 1rem;
  position: relative;
  display: flex;
  overflow: hidden;
  user-select: none;
  gap: var(--gap);
}

.marquee__content {
  flex-shrink: 0;
  display: flex;
  justify-content: space-around;
  gap: var(--gap);
  min-width: 100%;
}

@keyframes scroll {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(calc(-100% - var(--gap)));
  }
}

/* Pause animation when reduced-motion is set */
@media (prefers-reduced-motion: reduce) {
  .marquee__content {
    animation-play-state: paused !important;
  }
}

/* Enable animation */
.enable-animation .marquee__content {
  animation: scroll 10s linear infinite;
}

/* Attempt to size parent based on content. Keep in mind that the parent width is equal to both content containers that stretch to fill the parent. */
.marquee--fit-content {
  max-width: fit-content;
}

/* A fit-content sizing fix: Absolute position the duplicate container. This will set the size of the parent wrapper to a single child container. Shout out to Olavi's article that had this solution 👏 @link: https://olavihaapala.fi/2021/02/23/modern-marquee.html  */
.marquee--pos-absolute .marquee__content:last-child {
  position: absolute;
  top: 0;
  left: 0;
}

/* Enable position absolute animation on the duplicate content (last-child) */
.enable-animation .marquee--pos-absolute .marquee__content:last-child {
  animation-name: scroll-abs;
}

@keyframes scroll-abs {
  from {
    transform: translateX(calc(100% + var(--gap)));
  }
  to {
    transform: translateX(0);
  }
}

/* Other page demo styles */
.marquee__content > * {
  flex: 0 0 auto;
  color: white;
  background: dodgerblue;
  margin: 2px;
  padding: 1rem 2rem;
  border-radius: 0.25rem;
  text-align: center;
}

.marquee {
  //border: 2px dashed lightgray;
}

* {
  box-sizing: border-box;
}



section {
  margin-block: 3rem;
}

section > * + * {
  margin-block-start: 0.5rem;
}
</style>
</head>

<body>
	
<section class='enable-animation'>
  <div class="marquee">
    <ul class="marquee__content">
      <li>test name 1 1/2/2837 10,000.00</li>
      <li>test name 2 1/2/2837 10,000.00</li>
      <li>test name 3 1/2/2837 10,000.00</li>
      <li>test name 4 1/2/2837 10,000.00</li>
      <li>test name 5 1/2/2837 10,000.00</li>
      <li>test name 6 1/2/2837 10,000.00</li>
    </ul>
<!--MUST KEEP FOR GAPS-->
    <ul aria-hidden="true" class="marquee__content">
      <li>1</li>
      <li>2</li>
      <li>3</li>
      <li>4</li>
      <li>5</li>
      <li>6</li>
    </ul>
  </div>

</body>
</html>