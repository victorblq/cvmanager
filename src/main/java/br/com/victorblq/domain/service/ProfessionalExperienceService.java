/**
 * 
 */
package br.com.victorblq.domain.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.victorblq.domain.entity.professional_experience.ProfessionalExperience;
import br.com.victorblq.domain.repository.ProfessionalExperienceRepository;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Jan 7, 2019
 */
@Service
public class ProfessionalExperienceService {
	
	@Autowired
	private ProfessionalExperienceRepository professionalExperienceRepository;
	
	public List<ProfessionalExperience> listProfessionalExperience() {
		return this.professionalExperienceRepository.findAll();
	}
	
	public ProfessionalExperience insertProfessionalExperience(ProfessionalExperience professionalExperience) {
		return this.professionalExperienceRepository.save(professionalExperience);
	}
}