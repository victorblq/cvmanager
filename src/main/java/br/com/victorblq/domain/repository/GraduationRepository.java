/**
 * 
 */
package br.com.victorblq.domain.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.victorblq.domain.entity.graduation.Graduation;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Dec 28, 2018
 */
public interface GraduationRepository extends JpaRepository<Graduation, Long>{

}
