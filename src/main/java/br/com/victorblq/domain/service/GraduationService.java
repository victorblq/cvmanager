/**
 * 
 */
package br.com.victorblq.domain.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.victorblq.domain.entity.graduation.Graduation;
import br.com.victorblq.domain.repository.GraduationRepository;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Dec 28, 2018
 */
@Service
public class GraduationService {

	@Autowired
	private GraduationRepository graduationRepository;
	
	public List<Graduation> listGraduations() {
		return this.graduationRepository.findAll();
	}
	
}
