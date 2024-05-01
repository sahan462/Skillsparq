window.jsPDF = window.jspdf.jsPDF;
// Function to create PDF
function createPDF(orderJSON, sellerJSON, buyerJSON) {
    // Create a new jsPDF instance
    var doc = new window.jsPDF(); 
    var order = JSON.parse(orderJSON);
    var seller = JSON.parse(sellerJSON);
    var buyer = JSON.parse(buyerJSON);
    // Set fonts and font sizes
    doc.setFont("helvetica");
    doc.setFontSize(12);

    // Title "Skillsparq Group"
    doc.setFont("bold");
    doc.setFontSize(24);
    doc.text('Skillsparq Group', 105, 20, {align: 'center'});
    doc.line(14, 23, 200, 23);

    // Title "Invoice"
    doc.setFont("bold");
    doc.setFontSize(24);
    doc.text('Invoice', 14, 30, {align: 'left'});
    doc.line(14, 33, 200, 33);

    // Order and gig details
    doc.setFontSize(14);
    doc.setFont("bold");
    doc.text('Order Details', 14, 40);
    doc.line(14, 43, 200, 43);

    // Access values from JSON objects
    doc.setFontSize(12);
    doc.setFont("normal");
    doc.text('Order ID:', 14, 50);
    doc.text('State:', 14, 60);
    doc.text('Type:', 14, 70);
    doc.text('Created Date:', 14, 80);
    
    if(order.order_type == 'package'){
        doc.text('Gig ID:', 14, 90);
        doc.text('Gig Title:', 14, 100);
    }else if(order.order_type == 'job'){
        doc.text('Job ID:', 14, 90);
        doc.text('Job Title:', 14, 100);
    }

    doc.text('Deadline:', 14, 110);

    doc.text(order.order_id.toString(), 70, 50);
    doc.text(order.order_state.toString(), 70, 60);
    doc.text(order.order_type.toString(), 70, 70);
    doc.text(order.order_created_date.toString(), 70, 80);

    if(order.order_type == 'package'){
        doc.text(order.gig_id.toString(), 70, 90);
        doc.text(order.title.toString(), 70, 100);
    }else if(order.order_type == 'job'){
        doc.text(order.job_id.toString(), 70, 90);
        doc.text(order.title.toString(), 70, 100);
    }

    if(order.order_type == 'package'){
        doc.text(order.deadline.toString(), 70, 110);
    }else if(order.order_type == 'job'){
        doc.text(order.deadline.toString(), 70, 110);
    }

    // Buyer details
    doc.setFontSize(14);
    doc.setFont("bold");
    doc.text('Buyer Details', 14, 120);
    doc.line(14, 123, 200, 123);

    doc.setFontSize(12);
    doc.setFont("normal");
    doc.text('Name:', 14, 130);
    doc.text('Buyer ID:', 14, 140);
    doc.text('UserName:', 14, 150);
    doc.text('Country', 14, 160);

    doc.text(buyer.first_name + ' ' + buyer.last_name, 70, 130);
    doc.text(buyer.user_id.toString(), 70, 140);
    doc.text(buyer.user_name, 70, 150);
    doc.text(buyer.country, 70, 160);
    doc.line(14, 113, 200, 113);

    // Seller details
    doc.setFontSize(14);
    doc.setFont("bold");
    doc.text('Seller Details', 110, 120);

    doc.setFontSize(12);
    doc.setFont("normal");
    doc.text('Name:', 110, 130);
    doc.text('Seller ID:', 110, 140);
    doc.text('UserName:', 110, 150);
    doc.text('Country:', 110, 160);

    doc.text(seller.first_name + ' ' + seller.last_name, 150, 130);
    doc.text(seller.user_id.toString(), 150, 140);
    doc.text(seller.user_name, 150, 150);
    doc.text('Sri Lanka', 150, 160);

    // Table header
    doc.setDrawColor(0);
    doc.setFillColor(240, 240, 240);
    doc.rect(10, 170, 190, 10, 'F');
    doc.setTextColor(0);
    doc.setFont("bold");
    doc.text('Description', 15, 175);
    doc.text('Quantity', 80, 175);
    doc.text('Unit Price', 110, 175);
    doc.text('Amount', 160, 175);

    // Table content
    doc.setFont("normal");
    doc.setFontSize(12);
    doc.text('Product Name', 15, 185);
    doc.text('1', 80, 185);
    doc.text('$100.00', 110, 185);
    doc.text('$100.00', 160, 185);

    // Total
    doc.setFont("bold");
    doc.text('Total:', 110, 195);
    doc.text('$100.00', 160, 195);

    // Footer
    doc.setDrawColor(0);
    doc.rect(10, 265, 190, 20);
    doc.text('Thank you for your business!', 14, 272);

    // Save the PDF
    doc.save('invoice.pdf');
}
