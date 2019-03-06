<!-- Nevermind this code... Just for laughs.... -->
<script type="text/javascript">
function bang()
    {
      var audio = new Audio('/images/kazoo.wav');
      audio.play();
    }
</script>
    <div class="card-footer">
      <button type="button" class="btn btn-outline-danger float-right" data-toggle="modal" data-target="#exampleModal">Self Destruction Button</button>


      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header moccha">
          <h5 class="modal-title " id="exampleModalLabel">WARNING! DANGER!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body moccha">WITH SANE MIND AND IN FULL KNOWLEDGE OF THE MATERIAL, LEGAL AND MORAL CONSEQUENCES OF THIS DECISION OF MINE, I HEREBY DECLARE THAT I WISH FOR THE COMPLETE, UTTER AND IRREVOCABLE DESTRUCTION OF THE PRESENT WEBPAGE.
      </div>
      <div class="modal-footer moccha">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">NOOOOOOOO!!!!</button>
        <button type="button" class="btn btn-outline-danger float-right" data-dismiss="modal" data-toggle="modal" data-target="#exampleModal1" onclick="bang();">BURN, BABY BURN!</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header moccha">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body moccha">
Really now. What did you expect?</div>
<div class="modal-footer moccha">
  <button type="button" class="btn btn-outline-dark" onclick="bang();">That was fun! Plat it again!</button>
  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Enough with the bull... Let's do some work now.</button>
</div>
</div>
</div>
</div>
<!-- here ends laughter (All good things have to end sometime...)-->
