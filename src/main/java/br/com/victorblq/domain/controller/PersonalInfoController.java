package br.com.victorblq.domain.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.victorblq.domain.entity.personal_info.PersonalInfo;
import br.com.victorblq.domain.service.PersonalInfoService;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, 12/26/2018
 */
@RestController("personal_info")
public class PersonalInfoController {
	
	@Autowired
	private PersonalInfoService personalInfoService;
	
	@GetMapping
	public PersonalInfo getPersonalInfo() {
		return this.personalInfoService.getPersonalInfo();
	}
}
