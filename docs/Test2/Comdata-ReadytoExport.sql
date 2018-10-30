SELECT
	OrderReceipts.OR_ID AS expenseID,
	DATE_FORMAT(OrderRequests.DateC,'%m/%d/%Y') AS dateExpenseCreated,
	ORUsers.DisplayName AS expenseUser, 
	SUM(ROUND((OrderReceipts.ReceivedQuantity * PODetails.UnitCost),2)) AS OrderTotal
	FROM Bills
	JOIN PurchaseOrders        ON PurchaseOrders.PO_ID = Bills.PO_ID
	JOIN PODetails             ON PurchaseOrders.PO_ID = PODetails.PO_ID
	JOIN OrderReceipts         ON PODetails.ORDLine_ID = OrderReceipts.ORDLine_ID
	JOIN BillDetails           ON PODetails.POLine_ID = BillDetails.POLine_ID AND Bills.Bill_ID = BillDetails.Bill_ID
	JOIN OrderRequests         ON OrderReceipts.OR_ID = OrderRequests.OR_ID
	JOIN ORReceipts_BillDetail ON BillDetails.Bill_ID = ORReceipts_BillDetail.Bill_ID AND OrderReceipts.ORReceipts = ORReceipts_BillDetail.ORReceipts_ID
	JOIN OrderRequestsDetails  ON OrderRequestsDetails.OR_ID = OrderRequests.OR_ID AND OrderRequestsDetails.ORDLine_ID = PODetails.ORDLine_ID AND OrderRequestsDetails.ORDLine_ID = OrderReceipts.ORDLine_ID
	JOIN Items                 ON PODetails.Item_ID = Items.Item_ID
	JOIN ItemCategories        ON Items.ItemCategory_ID = ItemCategories.ItemCategory_ID
	JOIN Locations             ON OrderRequests.ChargeToLoc_ID = Locations.Location_ID
	JOIN LocationGroups        ON Locations.LocationGroup_ID = LocationGroups.LocationGroup_ID
	JOIN Vendors               ON PurchaseOrders.Vendor_ID = Vendors.Vendor_ID
	JOIN PaymentTerms          ON Bills.PaymentTerm_ID = PaymentTerms.PaymentTerm_ID
	JOIN Users                 ON Bills.CreatedBy_ID = Users.User_ID
	JOIN Users VendorUsers     ON Vendors.user_id = vendorUsers.user_ID
	JOIN Users ORUsers         ON OrderRequests.CreatedBy_ID = ORUsers.User_ID
	WHERE PurchaseOrders.POType_ID IN (20,25) 	
	AND ORReceipts_BillDetail.InvoiceNum IS NOT NULL
	AND OrderReceipts.ReceivedQuantity <> 0
	AND Bills.FlagForReview	= 0
	AND (OrderReceipts.ReceiptType_ID <= 3 OR OrderReceipts.ReceiptType_ID = 8 )
	AND PODetails.Reconciled = 1 
	AND (PODetails.DateE IS NULL OR ORReceipts_BillDetail.DateE IS NULL)
	-- AND Bills.DateC Between {ts '2012-06-02 15:20:46'} AND {ts '2017-06-03 23:59:59'} 
	AND PurchaseOrders.POStatus_ID IN (15,20,21)
	AND Bills.flagNoExport = 0 
	GROUP BY OrderReceipts.OR_ID
	ORDER BY OrderReceipts.OR_ID DESC