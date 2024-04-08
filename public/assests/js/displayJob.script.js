//------------------------------------Modal Behavior------------------------------------------------
    
// Wait for the DOM to fully load

var minBiddingValue = document.getElementById('startingbid').value
console.log(minBiddingValue)

const form = document.querySelector('form');
form.addEventListener('submit', handleSubmit);

function handleSubmit(event) {
  event.preventDefault();
}

//open Submit Modal
function openJobProposalModal(button) {
    packageForm = button.id;
    document.getElementById('overlayDisplayJob').style.display = 'flex';
    document.getElementById('modalIdDisplayJob').style.display = 'block';
}

// Function to confirm the action
function confirmAction(action) {
    var bidValueNum = document.getElementById('bidValue').value
    var description = document.getElementById('descriptionJobProposalText').value
    var attachment = document.getElementById('inputFile').value
    var minBiddingValue = document.getElementById('startingbid').value
    console.log(minBiddingValue)

    if (action === 'send'){

      if (description.trim() === ''){
        alert('Please enter a description for your proposal !!');
      }else if(attachment === ''){
        alert("Please insert an attachment to your proposal !!")
      }else if(bidValueNum === ''){
        alert("Please enter a bid !! ")
      }

      console.log(bidValueNum,minBiddingValue)
      if(bidValueNum < minBiddingValue){
        alert("Enter a Bid value which is larger than the minimum bid !!")
      }else{
        if((description !== '') && (attachment !== '') && (bidValueNum !== '')){
          document.getElementById('cancelConfirmationOverlay').style.display = 'none';
          document.getElementById('cancelConfirmation').style.display = 'none';
          document.getElementById('sendConfirmationOverlay').style.display = 'flex';
          document.getElementById('sendConfirmation').style.display = 'block';
        }
      }
      
    }else if(action === 'cancel') {

      document.getElementById('sendConfirmationOverlay').style.display = 'none';
      document.getElementById('sendConfirmation').style.display = 'none';
      document.getElementById('cancelConfirmationOverlay').style.display = 'flex';
      document.getElementById('cancelConfirmation').style.display = 'block';
    
    } 

}

// Function to handle actions based on user confirmation
function handleConfirmation(action) {
    if (action === 'sendYes') {

        var sendJobProposal = document.getElementById('sendJobProposal');
        sendJobProposal.submit();
        alert('Successfully Sent The Proposal!');

    }else if (action === 'sendNo'){

        document.getElementById('sendConfirmation').style.display = 'none';
        document.getElementById('sendConfirmationOverlay').style.display = 'none';

    }else if(action === 'cancelNo'){

        document.getElementById('cancelConfirmation').style.display = 'none';
        document.getElementById('cancelConfirmationOverlay').style.display = 'none';

    }
    else{

        document.getElementById('cancelConfirmationOverlay').style.display = 'none';
        document.getElementById('cancelConfirmation').style.display = 'none';
        document.getElementById('overlayDisplayJob').style.display = 'none';
        document.getElementById('modalIdDisplayJob').style.display = 'none';

    }

}