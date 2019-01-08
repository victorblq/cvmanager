/**
 * 
 */
package br.com.victorblq.domain.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.victorblq.domain.entity.professional_experience.ProfessionalExperience;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Jan 7, 2019
 */
public interface ProfessionalExperienceRepository extends JpaRepository<ProfessionalExperience, Long>{

}
