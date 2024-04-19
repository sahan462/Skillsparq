//------------------------------------Modal Behavior------------------------------------------------
    
// Wait for the DOM to fully load

var startBidVal = document.getElementById('startBidAmnt').value

const form = document.querySelector('form');
form.addEventListener('submit', handleSubmit);

//open Submit Modal for auction mode
function openJobProposalModalAuc(button) {
    packageForm = button.id;
    document.getElementById('overlayDisplayJobAuc').style.display = 'flex';
    document.getElementById('modalIdDisplayJobAuc').style.display = 'block';
}

// Function to confirm the action
function confirmActionAuc(action) {
  var bidValueNum = document.getElementById('bidValue').value
  var description = document.getElementById('descriptionJobProposalAuc').value
  var attachment = document.getElementById('inputFile').value
  console.log(startBidVal)

  if (action === 'send'){
    if (description.trim() === ''){
      alert('Please enter a description for your proposal !!');
    }else if(attachment === ''){
      alert("Please insert an attachment to your proposal !!")
    }else if(bidValueNum === ''){
      alert("Please enter a bid !! ")
    }
    console.log(bidValueNum,startBidVal)
    if(bidValueNum > startBidVal){
      alert("Enter a Bid value which is lesser than the Starting bid !!")
    }else{
      if((description !== '') && (attachment !== '') && (bidValueNum !== '')){
        document.getElementById('cancelConfirmOverlayAuc').style.display = 'none';
        document.getElementById('cancelConfirmAuc').style.display = 'none';
        document.getElementById('sendConfirmaOverlayAuc').style.display = 'flex';
        document.getElementById('sendConfirmAuc').style.display = 'block';
      }
    }
  }else if(action === 'cancel') {
    document.getElementById('sendConfirmaOverlayAuc').style.display = 'none';
    document.getElementById('sendConfirmAuc').style.display = 'none';
    document.getElementById('cancelConfirmOverlayAuc').style.display = 'flex';
    document.getElementById('cancelConfirmAuc').style.display = 'block';
  } 
}

// Function to handle actions based on user confirmation
function handleConfirmAuc(action) {
    if (action === 'sendYes') {
        var sendJobProposal = document.getElementById('sendJobProposalAuc');
        sendJobProposal.submit();
        alert('Successfully Sent The Proposal!');
    }else if (action === 'sendNo'){
        document.getElementById('sendConfirmAuc').style.display = 'none';
        document.getElementById('sendConfirmaOverlayAuc').style.display = 'none';
    }else if(action === 'cancelNo'){
        document.getElementById('cancelConfirmAuc').style.display = 'none';
        document.getElementById('cancelConfirmOverlayAuc').style.display = 'none';
    }
    else{
        document.getElementById('cancelConfirmOverlayAuc').style.display = 'none';
        document.getElementById('cancelConfirmAuc').style.display = 'none';
        document.getElementById('overlayDisplayJobAuc').style.display = 'none';
        document.getElementById('modalIdDisplayJobAuc').style.display = 'none';
    }
}

// open submit modal for standard mode

function openJobProposalModalStd(button) {
  packageForm = button.id;
  document.getElementById('overlayDisplayJobStd').style.display = 'flex';
  document.getElementById('modalIdDisplayJobStd').style.display = 'block';
}

// Function to confirm the action
function confirmActionStd(action) {
  // var bidValueNum = document.getElementById('bidValue').value
  var description = document.getElementById('descriptionJobProposalStd').value
  var attachment = document.getElementById('inputFileStd').value
  // var startBidVal = document.getElementById('startingbid').value
  // console.log(startBidVal)

  if (action === 'send'){
    if (description.trim() === ''){
      alert('Please enter a description for your proposal !!');
    }else if(attachment === ''){
      alert("Please insert an attachment to your proposal !!")
    }
    if((description !== '') && (attachment !== '')){
      document.getElementById('cancelConfirmOverlayStd').style.display = 'none';
      document.getElementById('cancelConfirmStd').style.display = 'none';
      document.getElementById('sendConfirmOverlayStd').style.display = 'flex';
      document.getElementById('sendConfirmStd').style.display = 'block';
    }
  }else if(action === 'cancel') {
    document.getElementById('sendConfirmOverlayStd').style.display = 'none';
    document.getElementById('sendConfirmStd').style.display = 'none';
    document.getElementById('cancelConfirmOverlayStd').style.display = 'flex';
    document.getElementById('cancelConfirmStd').style.display = 'block';
  } 
}

// Function to handle actions based on user confirmation
function handleConfirmStd(action) {
  if (action === 'sendYes') {
      var sendJobProposal = document.getElementById('sendJobProposalStd');
      sendJobProposal.submit();
      alert('Successfully Sent The Proposal!');
  }else if (action === 'sendNo'){
      document.getElementById('sendConfirmStd').style.display = 'none';
      document.getElementById('sendConfirmOverlayStd').style.display = 'none';
  }else if(action === 'cancelNo'){
      document.getElementById('cancelConfirmStd').style.display = 'none';
      document.getElementById('cancelConfirmOverlayStd').style.display = 'none';
  }
  else{
      document.getElementById('cancelConfirmOverlayStd').style.display = 'none';
      document.getElementById('cancelConfirmStd').style.display = 'none';
      document.getElementById('overlayDisplayJobStd').style.display = 'none';
      document.getElementById('modalIdDisplayJobStd').style.display = 'none';
  }
}