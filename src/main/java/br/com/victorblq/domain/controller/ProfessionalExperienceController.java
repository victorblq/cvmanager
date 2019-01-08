/**
 * 
 */
package br.com.victorblq.domain.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.victorblq.domain.entity.professional_experience.ProfessionalExperience;
import br.com.victorblq.domain.service.ProfessionalExperienceService;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Jan 7, 2019
 */

@RestController
@RequestMapping(value = "/professional_experience")
public class ProfessionalExperienceController {
	
	@Autowired
	ProfessionalExperienceService professionalExperienceService;
	
	@GetMapping
	public List<ProfessionalExperience> listProfessionalExperience(){
		return this.professionalExperienceService.listProfessionalExperience();
	}
	
	@PostMapping
	public ProfessionalExperience insertProfessionalExperience(@RequestBody ProfessionalExperience professionalExperience) {
		return this.professionalExperienceService.insertProfessionalExperience(professionalExperience);
	}
}
