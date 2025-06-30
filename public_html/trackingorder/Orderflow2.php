            <div class="flow-ctn flowBG2">
        	<span class="flow" style="margin:48px 0 0 260px;">
                <span class="f60" id="a1">
                    <span class="fl"></span><span class="fm" style="width:217px;"><div style="height:10px; overflow:hidden;"></div>Order received,<br/>file under review</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 1); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
            
            <div class="clear"></div>
            
        	<span class="flow" style="margin: 42px 0 0 260px;">
                <span class="f48" id="a3">
                    <span class="fl"></span><span class="fm" style="width:217px;">Order confirm,job started</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 2); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
            
            <div class="clear"></div>
            
        	<span class="flow" style="margin: 83px 0 0 200px;">
                <span class="f60" id="c1">
                    <span class="fl"></span><span class="fm" style="width:161px;"><div style="height:10px; overflow:hidden;"></div>QT perparing<br/>the componens quote</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 11); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
        	<span class="flow" style="margin: 81px 0 0 0px;">
                <span class="f60" id="a5">
                    <span class="fl"></span><span class="fm" style="width:153px;"><div style="height:20px; overflow:hidden;"></div>Under manufacturing</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 3); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
            
            <div class="clear"></div>
            
        	
        	<span class="flow" style="margin: 45px 0 0 200px;">
                <span class="f81" id="c2">
                    <span class="fl"></span><span class="fm" style="width:161px;"><div style="height:10px; overflow:hidden;"></div>Components quote sent<br/>to customer and waiting<br/>for approval</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 12); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
        	<span class="flow" style="margin: 45px 0 0 0px;">
                <span class="f81" id="a6">
                    <span class="fl"></span><span class="fm" style="width:153px;"><div style="height:30px; overflow:hidden;"></div>Under PCB QC check</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 20); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
            
            <div class="clear"></div>

        	<span class="flow" style="margin: 45px 0 0 200px;">
                <span class="f60" id="c3">
                    <span class="fl"></span><span class="fm" style="width:161px;"><div style="height:10px; overflow:hidden;"></div>QT start sourcing<br/>the components</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 13); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
            
            <div class="clear"></div>
            
        	<span class="flow" style="margin: 45px 0 0 200px;">
                <span class="f60" id="c4">
                    <span class="fl"></span><span class="fm" style="width:161px;"><div style="height:10px; overflow:hidden;"></div>Components recevied,<br/>checking in progress</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 14); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
            
            <div class="clear"></div>
            
        	<span class="flow" style="margin: 45px 0 0 200px;">
                <span class="f60" id="c5">
                    <span class="fl"></span><span class="fm" style="width:184px;"><div style="height:10px; overflow:hidden;"></div>Components ready for<br/>assembly</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 15); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
        	         
        	<span class="flow" style="margin: 45px 0 0 0px;">
                <span class="f60" id="a7">
                    <span class="fl"></span><span class="fm" style="width:153px;"><div style="height:20px; overflow:hidden;"></div>PCB ready for assembly</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 21); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
            
            <div class="clear"></div>
            
        	<span class="flow" style="margin: 70px 0 0 260px;">
                <span class="f48" id="a8">
                    <span class="fl"></span><span class="fm" style="width:217px;">Under assembly process</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 4); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
            
            <div class="clear"></div>
            
        	<span class="flow" style="margin: 43px 0 0 260px;">
                <span class="f48" id="a9">
                    <span class="fl"></span><span class="fm" style="width:217px;">Under final QC check</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 9); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
            
            <div class="clear"></div>
            
        	<span class="flow" style="margin: 43px 0 0 260px;">
                <span class="f48" id="a10">
                    <span class="fl"></span><span class="fm" style="width:217px;">Shopping to UK office</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 5); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
            
            <div class="clear"></div>
            
        	<span class="flow" style="margin: 43px 0 0 260px;">
                <span class="f48" id="a11">
                    <span class="fl"></span><span class="fm" style="width:217px;">Despatch to customer</span><span class="fr"></span>
                    <label><?php $p = $orderProcessingService->GetOrderProcessingByOrderIdAndStatusId($order->Id, 6); echo Common::ChangeDateFormat($p->ProcessTime,"dateTime"); ?></label>
                </span>
            </span>
        </div> 