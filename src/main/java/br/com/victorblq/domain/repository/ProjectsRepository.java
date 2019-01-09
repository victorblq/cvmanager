package br.com.victorblq.domain.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.victorblq.domain.entity.project.Project;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Jan 9, 2019
 */
public interface ProjectsRepository extends JpaRepository<Project, Long>{

}
