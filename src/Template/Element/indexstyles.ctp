<style>
.fmactionbtn{
  float:right;
  }
.fmactions{
  float:left;
  }
.fmactions .fmaction{
    float:left;
}
.fmactions .fmaction span{
    position: relative;
    top: -20px;
    right:10px;
    font-size:10px;
    font-weight:bold;
  }

  .fmactions .fmaction > button:hover {

    animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
    transform: translate3d(0, 0, 0);
    backface-visibility: hidden;
    perspective: 1000px;
}
  @keyframes shake {
    10%, 90% {
      transform: translate3d(-1px, 0, 0);
    }
    20%, 80% {
      transform: translate3d(2px, 0, 0);
    }
    30%, 50%, 70% {
      transform: translate3d(-4px, 0, 0);
    }
    40%, 60% {
      transform: translate3d(4px, 0, 0);
    }
  }
</style>
