SELECT 10 AS segmentnumber
     , 'Save' AS action
     , wo_number AS accoutncode
     , wo_description AS description
     , NULL AS reference_id
     , NULL AS accountcodegroup_id
     , NULL AS acccodegroupname
     , 0 AS accounttype_id
     , 'Equipment Work Order' AS accounttypedesc
     , 1 AS enabled
     , wo_comp_code AS parentref1
     , eme_eqp_code parentref2
     , wo__iu__create_date createdatetime
     , wo__iu__update_date updatedatetime
  FROM da.prmworkorders
     , da.emequipment_table
 WHERE wo_eqp_oraseq = eme_eqp_oraseq
   AND wo_comp_code <> 'ZZ'